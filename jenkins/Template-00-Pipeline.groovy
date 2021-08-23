#!groovy​
pipeline{
    agent any
    options {
        buildDiscarder(logRotator(numToKeepStr: '10'))
    }
    parameters {
        string(name: 'RELEASE_VERSION', defaultValue: 'latest', description: 'Define release version')
        booleanParam(name: 'NO_CACHE', defaultValue: false, description: 'Force no cache for build')
        booleanParam(name: 'IS_LATEST', defaultValue: false, description: 'Is also latest for fixed version')
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
        stage ('Build docker container'){
            steps {
                build job: '../Vivantes-01-Build-docker-container/' + env.BRANCH_NAME, parameters:[
                    string(name: 'RELEASE_VERSION', value: params.RELEASE_VERSION),
                    booleanParam(name: 'NO_CACHE', value: params.NO_CACHE),
                    booleanParam(name: 'IS_LATEST', value: params.IS_LATEST)
                ]
                echo 'Finishing build docker container'
            }
        }
        stage ('Deploy stage'){
            steps{
                build job: '../Vivantes-02-Deploy-stage/' + env.BRANCH_NAME
                echo 'Finishing Deploy stage'
            }
        }
    }
}
