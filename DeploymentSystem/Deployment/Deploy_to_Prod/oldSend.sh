#!/bin/bash
MACH=$1
FILE=$2
	if  [ $MACH == 'FE' ]
        then
                # Main Prod FE
        	IP_D="192.168.1.110"
        	USER_M="ali"
       		PASS_M="family03"
			
		# Backup Prod FE
                IP_S="192.168.1.111"
                USER_M="ali"
                PASS_M="family03"
	else
		# Main Prod BE
		IP_D="192.168.1.106"
                USER_M="ali"
                PASS_M="family03"

		# Backup Prod BE
                IP_S="192.168.1.107"
                USER_M="ali"
                PASS_M="family03"
	fi

pass="family03"

/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_D}" "cd /home/${USER_M}/Deploy/Production/Packages/; sudo rm *.zip; cd /var/www/bookScape; sudo yes | cp -rf ./* ../Backup/; cd /var/www/bookScape/; sudo rm -r ./*; cd /var/www/; sudo cp -r rmq ./bookScape"

cd ~/Deploy/Deployment/Packages/
 sshpass -p "${PASS_M}" scp ${FILE} "${USER_M}"@"${IP_D}":~/Deploy/Production/Packages/


/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_D}" "sudo unzip -o /home/${USER_M}/Deploy/Production/Packages/${FILE} -d /var/www/bookScape/; cd /var/www/bookScape/FE/; sudo yes | cp -rf ./* "

/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_S}" "cd /home/${USER_M}/Deploy/Production/Packages/; sudo rm *.zip; cd /var/www/bookScape; sudo yes | cp -rf ./* ../Backup/; cd /var/www/bookScape/; sudo rm -r ./*"

cd ~/Deploy/Deployment/Packages/
 sshpass -p "${PASS_M}" scp ${FILE} "${USER_M}"@"${IP_S}":~/Deploy/Production/Packages/

/usr/bin/sshpass -p ${pass} ssh -t root@"${IP_S}" "sudo unzip -o /home/${USER_M}/Deploy/Production/Packages/${FILE} -d /var/www/bookScape/; cd /var/www/bookScape/FE/; sudo yes | cp -rf ./* .."
