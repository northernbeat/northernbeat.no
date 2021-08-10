#!/bin/bash

echo "Backing up old files to ~/tmp/nbeat"
rm -rf ~/tmp/nbeat/*
cp -av ~/www/wp-content/plugins/NorthernBeatPlugin ~/tmp/nbeat/
cp -av ~/www/wp-content/themes/NorthernBeat3 ~/tmp/nbeat/

echo "Removing old files"
rm -rf ~/www/wp-content/plugins/NorthernBeatPlugin
rm -rf ~/www/wp-content/themes/NorthernBeat3

echo "Unpacking new files"
unzip NorthernBeatPlugin.zip -d ~/www/wp-content/plugins/
unzip NorthernBeatTheme3.zip -d ~/www/wp-content/themes/
