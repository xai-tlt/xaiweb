//!groovy​
// use snippet generator

pipeline{
    agent any
    options {
        buildDiscarder(logRotator(numToKeepStr: '10'))
    }
    parameters {
        string(defaultValue: 'latest', description: '', name: 'RELEASE_VERSION', trim: false)
        booleanParam(defaultValue: false, description: '', name: 'NO_CACHE')
        booleanParam(defaultValue: false, description: '', name: 'IS_LATEST')
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
        stage ('Build and push'){
            steps {
                ansiColor('xterm') {
                    echo 'Build and push container'
                    sh script: '''
                    cd docker
                    if [ "$NO_CACHE" = true ] ; then
                        docker-compose build --pull --no-cache
                    else
                        docker-compose build
                    fi
                    docker tag  reg.xailabs.com/xaiweb-2021/wordpress:latest reg.xailabs.com/xaiweb-2021/wordpress:${RELEASE_VERSION}
                    docker push reg.xailabs.com/xaiweb-2021/wordpress:${RELEASE_VERSION}

                    if [ "$IS_LATEST" = true -a ! "$RELEASE_VERSION" = "latest" ] ; then
                        docker push reg.xailabs.com/xaiweb-2021/wordpress:latest
                    fi
                    '''
                }
            }
        }
    }
}
