#!/bin/bash

MACH=$1
FILE=$2
#Deploy Machin Info
                IP_D="192.168.1.104"
                USER_M="ali"
                PASS_M="family03"
        
echo "Cleaning out local files..."
cd ~/Deploy/Production/Packages/
sudo rm -r ./*.zip

echo "Getting old version from deploy..."

pAs="family03"

/usr/bin/sshpass -p ${PASS_M} ssh -t "${USER_M}"@"${IP_D}" "cd /home/${USER_M}/Deploy/Deployment/send_Production/; ./getPack.sh ${MACH} ${FILE};"

exit 0
