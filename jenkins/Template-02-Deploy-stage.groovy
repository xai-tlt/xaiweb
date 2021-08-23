//!groovy​
// use snippet generator

pipeline{
    agent any
    options {
        buildDiscarder(logRotator(numToKeepStr: '10'))
    }
    stages{
        stage ('Rollout'){
            steps {
                ansiColor('xterm') {
                    echo 'Checkout stack'
                    sshagent(['36ed4c54-968c-433a-b476-4d2a36b67c71']) {
                        sh script:'''
                            ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@192.168.70.160 <<EOF
                                kubectl rollout restart deployment vivantes-wordpress --namespace=blumberry --insecure-skip-tls-verify
                                sleep 5
                                kubectl get all --namespace=blumberry
EOF'''
                    }
                }
            }
        }
    }
}
