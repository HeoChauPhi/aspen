#!/bin/bash

# Variables
txtgrn=$(tput setaf 2) # Green
txtrst=$(tput sgr0) # Text reset.

COMMIT_MESSAGE="Deploy by $(git config --get user.name), $(git rev-parse --abbrev-ref HEAD) ($(git rev-parse --short HEAD))"
PANTHEON_GIT_URL="ssh://codeserver.dev.e111bbe2-f823-4106-8a57-0ca6dc63763d@codeserver.dev.e111bbe2-f823-4106-8a57-0ca6dc63763d.drush.in:2222/~/repository.git"

# If the Pantheon git directory does not exist.
if [ ! -d ".pantheon" ]
then
	# Clone the Pantheon repoa
	echo -e "\n${txtgrn}Cloning Pantheon repository ${txtrst}"
	git clone $PANTHEON_GIT_URL ".pantheon"
else
	echo -e "\n${txtgrn}Pull latest from Pantheon ${txtrst}"
	git -C ".pantheon" pull
fi

echo -e "\n${txtgrn}Applying new changes to Pantheon repo ${txtrst}"
bash -c 'rsync -a --delete "../source/" ".pantheon/" --exclude .git --exclude .gitignore --exclude mu-plugins --exclude pantheon.yml --exclude license.txt --exclude readme.html --exclude uploads --exclude wp-config.php'
#xcopy 'D:/wamp64/www/demowp/aspen/source' 'D:/wamp64/www/demowp/aspen/deploy/.pantheon' /E /I /Y

# Move into the pantheon repo to apply changes.
cd .pantheon
git add -A
git commit -m"$COMMIT_MESSAGE"

echo -e "\n${txtgrn}Pushing the master branch to Pantheon ${txtrst}"
git push --force
