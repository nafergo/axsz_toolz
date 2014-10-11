#!/bin/bash
# a set of tools to help creating WebM videos based on FFmpeg
#
# Copyleft 2012 Luis Carvalheiro & Nelson Goncalves (animaxionstudioz.com)
#
# ***** BEGIN GPL LICENSE BLOCK *****
#
#   This program is free software: you can redistribute it and/or modify
#   it under the terms of the GNU General Public License as published by
#   the Free Software Foundation, either version 3 of the License, or
#   (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU General Public License for more details.
#
#    You should have received a copy of the GNU General Public License
#    along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
# ***** END GPL LICENCE BLOCK *****

# Starting window
# janela não está bem.. se calhar temos mesmo de utilizar o ficheiro de texto externo...
# queria que ao clicar no Cancel o programa abortasse

# You must place file "COPYING" in same folder of this script.

function cancel() {
   
   if [ $? = 1 ];
	then 
	zenity --error --title="$WindowTitle" --text "Program Aborted!"
	/bin/kill -9 $(pidof -x $0)
	/bin/kill -9 $(pidof zenity) #Just in case...
	
	fi
}
trap cancel ERR SIGTERM


zenity --text-info --width=560 --height=320 --title="WebMizer" --filename=info

file=$(zenity --width=360 --height=320 --list --title "WebMizer" --text "Please choose..." --column Tools "PNG to WebM no sound" "PNG to WebM with sound" "Video to WebM" "Help")

if [ "$file" = "PNG to WebM no sound" ]; then
    exec tools/PNG_WebMizer.sh

elif [ "$file" = "PNG to WebM with sound" ]; then
    exec tools/PNG_sound_WebMizer.sh

elif [ "$file" = "Video to WebM" ]; then
    exec tools/Video_WebMizer.sh

elif [ "$file" = "Help" ]; then
    sensible-browser ./help/WebMizer_Help.html

else
    exit 0

fi
