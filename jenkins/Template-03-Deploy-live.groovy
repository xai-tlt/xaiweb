//!groovy​
// use snippet generator

pipeline{
    agent any
    options {
        buildDiscarder(logRotator(numToKeepStr: '10'))
    }
    parameters {
        string(defaultValue: 'latest', name: 'RELEASE_VERSION', description: 'Define release version')
    }
    stages{
        stage ('Check'){
            steps{
                ansiColor('xterm') {
                    script {
                        if (params.RELEASE_VERSION == null || params.RELEASE_VERSION.length() == 0) {
                            // Use SUCCESS FAILURE or ABORTED
                            currentBuild.result = "FAILURE"
                            throw new Exception("No release version selected")
                        }
                    }
                    echo 'Release is ' + params.RELEASE_VERSION
                }
            }
        }
        stage ('Pull'){
            steps {
                ansiColor('xterm') {
                    echo 'Pull container'
                    sh 'docker push reg.xailabs.com/blumberry/vivantes-wordpress:${RELEASE_VERSION}'
                }
            }
        }
        stage ('Archive'){
            steps {
                ansiColor('xterm') {
                    echo 'Archive tar'
                    sh 'docker run -v ${WORKSPACE}/archive:/tmp reg.xailabs.com/blumberry/vivantes-wordpress:${RELEASE_VERSION} cp -r /var/www/html/wp-content/themes/ /var/www/html/wp-content/plugins/ /var/www/html/wp-content/languages/ /var/www/html/favicon.ico /tmp'
                    sh 'tar -cf vivantes_${RELEASE_VERSION}-${BUILD_NUMBER}.tar archive'
                    archiveArtifacts 'vivantes_${RELEASE_VERSION}-${BUILD_NUMBER}.tar'
                    sh 'sudo rm -rf ${WORKSPACE}/archive/'
                }
            }
        }
        stage ('Deploy'){
            steps {
                ansiColor('xterm') {
                    echo 'Deploy archive'
                    sshagent(['63af8a43-e6ba-44b3-8b75-cf1ff2e4f745']) {
                        sh 'scp -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no vivantes_${RELEASE_VERSION}-${BUILD_NUMBER}.tar wp@b3hs5y.myraidbox.de:/home/wp/disk/wordpress/wp-content/releases/jenkins_job_${BUILD_NUMBER}.tar'
                        sh '''ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no wp@b3hs5y.myraidbox.de <<EOF
                                cd /home/wp/disk/wordpress/wp-content/releases/
                                tar -xf jenkins_job_${BUILD_NUMBER}.tar
                                mv archive jenkins_${BUILD_NUMBER}
                                rm -f jenkins_job_${BUILD_NUMBER}.tar
                                cd /home/wp/disk/wordpress/wp-content/
                                ln -snf releases/jenkins_${BUILD_NUMBER}/languages lanuages && \
                                 ln -snf releases/jenkins_${BUILD_NUMBER}/plugins plugins && \
                                 ln -snf releases/jenkins_${BUILD_NUMBER}/themes themes
                                cd ../
                                ln -snf wp-content/releases/jenkins_${BUILD_NUMBER}/favicon.ico favicon.ico
EOF'''
                    }
                }
            }
        }
        stage ('Reset'){
            steps {
                ansiColor('xterm') {
                    echo 'Reset cache'
                    script {
                        def response = httpRequest validResponseCodes: '200', customHeaders: [[ name: 'Authorization', value: 'Basic cmI6aGVsZGVu']], url: "https://wirvantes.de/wp-content/themes/helden/reset_cache_FJhpavZh2Hd3mrwi.php"
                        println('Response: '+response.content)
                    }
                    sshagent(['63af8a43-e6ba-44b3-8b75-cf1ff2e4f745']) {
                        sh '''ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no wp@b3hs5y.myraidbox.de <<EOF
                                rm -rf /home/wp/disk/wordpress/wp-content/nginx_cache/
EOF'''
                    }
                }
            }
        }
    }
}
