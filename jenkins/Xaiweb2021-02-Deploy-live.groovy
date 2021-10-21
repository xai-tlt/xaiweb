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
                            sshpass -p p3EXfnVWeVhLfLCqj7wA ssh -o UserKnownHostsFile=/dev/null -o StrictHostKeyChecking=no root@116.203.138.20 <<EOF
                                kubectl rollout restart deployment template-wordpress --namespace=xaiweb-2021 --insecure-skip-tls-verify
                                sleep 5
                                kubectl get all --namespace=xaiweb-2021 
EOF'''
                    }
                }
            }
        }
    }
}
