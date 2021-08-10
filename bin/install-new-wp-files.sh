#!/bin/bash
#
# Update WordPress plugin and theme
# Looks for the appropriate zip files in the home directory, so make sure they
# are named and placed accordingly.
#
# Author:  Eirik Refsdal <eirik@nbeat.no>
# Version: 2021-08-10

readonly TEXT_DEFAULT=`tput sgr0`
readonly TEXT_ERROR=`tput setaf 1`
readonly TEXT_SUCCESS=`tput setaf 2`

readonly BACKUP_PATH=$HOME"/backup/wp-content"

readonly WP_PATH=$HOME"/www/wp-content/"
readonly WP_THEMES_PATH=$WP_PATH"themes/"
readonly WP_PLUGINS_PATH=$WP_PATH"plugins/"

readonly NBEAT_PLUGIN_ZIP=$HOME"/NorthernBeatPlugin.zip"
readonly NBEAT_PLUGIN_PATH=$WP_PLUGINS_PATH"NorthernBeatPlugin"
readonly NBEAT_THEME_ZIP=$HOME"/NorthernBeatTheme.zip"
readonly NBEAT_THEME_PATH=$WP_THEMES_PATH"NorthernBeatTheme"

init()
{
    if [ ! -f "${NBEAT_PLUGIN_ZIP}" ]; then
        echo "Plugin zip file does not exist. Exiting."
        exit 1
    fi

    if [ ! -f "${NBEAT_THEME_ZIP}" ]; then
        echo "Theme zip file does not exist. Exiting."
        exit 1
    fi

    if [ -d "${BACKUP_PATH}" ]; then
        echo -n "Removing old backup...       "
        rm -rf ${BACKUP_PATH}
        echo "${TEXT_SUCCESS}done${TEXT_DEFAULT}"
    fi

    echo -n "Creating backup directory... "
    mkdir -p ${BACKUP_PATH}
    echo "${TEXT_SUCCESS}done${TEXT_DEFAULT}"
}

backup_current_code()
{
    echo -n "Backing up current code...   "
    cp -a ${NBEAT_PLUGIN_PATH} ${BACKUP_PATH}
    cp -a ${NBEAT_THEME_PATH} ${BACKUP_PATH}
    echo "${TEXT_SUCCESS}done${TEXT_DEFAULT}"
}

remove_current_code()
{
    echo -n "Removing current code...     "
    rm -rf ${NBEAT_PLUGIN_PATH}
    rm -rf ${NBEAT_THEME_PATH}
    echo "${TEXT_SUCCESS}done${TEXT_DEFAULT}"
}

install_new_code()
{
    echo -n "Installing new code...       "
    unzip -qq ${NBEAT_PLUGIN_ZIP} -d ${WP_PLUGINS_PATH}
    unzip -qq ${NBEAT_THEME_ZIP} -d ${WP_THEMES_PATH}
    echo "${TEXT_SUCCESS}done${TEXT_DEFAULT}"
}

init
backup_current_code
remove_current_code
install_new_code
