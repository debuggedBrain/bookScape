#!/bin/bash
#set -x

MACH=$1
VER=$2

#Info for Deploy VM
        IP_D="192.168.1.104"
        USER_M="ali"
        PASS_M="family03"


#IP_M="$(ifconfig enp0s3 | grep 'inet ' | awk '{print $2}' | cut -d/ -f1)"
#echo "${IP_M}"

#use MACH variable to determine which folders to zip n send, it will be either FE or BE
echo "ip is ${IP_M} machine is ${MACH} version is ${VER}"
	if  [ $MACH == 'FE' ]
	then
		#zip files for FE and send
       		cd ~/Development/DoZip/
	      		zip FE_version_${VER}.zip FE/*
		#send to deploy VM
        		sshpass -p "${PASS_M}" scp FE_version_${VER}.zip "${USER_M}"@"${IP_D}":~/Deploy/Deployment/Packages
		# unzip in deploy vm and move to new location
        		sshpass -p "${PASS_M}" ssh "${USER_M}"@"${IP_D}" 'unzip ~/Deploy/Deployment/Packages/FE_version_'${VER}'.zip -d ~/Deploy/Deployment/Host'

		exit 0
	
	else
        	#zip files for BE and send
        	cd ~/Development/DoZip/
                	zip BE_version_${VER}.zip BE/*
        	#send to deploy VM
                	sshpass -p "${PASS_M}" scp BE_version_${VER}.zip "${USER_M}"@"${IP_D}":~/Deploy/Deploment/Packages
        	#unzip in deploy vm and move to new location
                	sshpass -p "${PASS_M}" ssh "${USER_M}"@"${IP_D}" 'unzip ~/Deploy/Deployment/Packages/BE_version_'${VER}'.zip -d ~/Deploy/Deployment/Host'

        fi

