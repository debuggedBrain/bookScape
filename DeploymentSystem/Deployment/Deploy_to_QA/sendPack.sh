#!/bin/bash
MACH=$1
FILE=$2
	if  [ $MACH == 'FE' ]
        then
                #FE
        	IP_QA="192.168.1.108"
        	USER="ali"
       		PASS="family03"
	else
		#BE
		IP_QA="192.168.1.109"
                USER="ali"
                PASS="family03"
	fi

pass="family03"

/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_QA}" "cd /home/${USER}/Deploy/QA/Files/; sudo rm *.zip;"

cd ~/Deploy/Deployment/Packages/
 sshpass -p "${PASS}" scp ${FILE} "${USER}"@"${IP_QA}":~/Deploy/QA/Files/

/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_QA}" "sudo unzip -o /home/${USER}/Deploy/QA/Files/${FILE} -d /var/www/bookScape/; cd /var/www/bookScape/FE; sudo yes | cp -r ./* .."
