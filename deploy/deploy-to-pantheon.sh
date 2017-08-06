#!/bin/bash

# Variables
txtgrn=$(tput setaf 2) # Green
txtrst=$(tput sgr0) # Text reset.

COMMIT_MESSAGE="Deploy by $(git config --get user.name), $(git rev-parse --abbrev-ref HEAD) ($(git rev-parse --short HEAD))"
PANTHEON_GIT_URL="ssh://codeserver.dev.32cdfc62-1baa-4baa-8373-67d11d0e8fe7@codeserver.dev.32cdfc62-1baa-4baa-8373-67d11d0e8fe7.drush.in:2222/~/repository.git"

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
bash -c 'rsync -a --delete "source/" ".pantheon/" --exclude .git --exclude .gitignore --exclude .env --exclude uploads'
#xcopy 'D:/wamp64/www/demowp/aspen/source' 'D:/wamp64/www/demowp/aspen/deploy/.pantheon' /E /I /Y

# Move into the pantheon repo to apply changes.
#cd .pantheon
#git add -A
#git commit -m"$COMMIT_MESSAGE"

#echo -e "\n${txtgrn}Pushing the master branch to Pantheon ${txtrst}"
#git push --force
