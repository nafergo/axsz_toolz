#!/bin/bash
# Project DIrectory Structure Creator: a set of tools to help creating folders
# Version: 1.0
# Copyleft 2013 Luis Carvalheiro & Nelson Gonçalves [nafergo] (animaxionstudioz.com)
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

function cancel() {
   
   if [ $? = 1 ];
	then 
	yad --error --title="$WindowTitle" --text "Program Aborted!"
	/bin/kill -9 $(pidof -x $0)
	/bin/kill -9 $(pidof yad) #Just in case...
	
	fi
}
trap cancel ERR SIGTERM


# yad messages
WindowTitle="ProDISC - 3D Animation"
ChooseDirectory="Choose project directory location"
ChooseProdFolders="Choose production folders"
ChoosePreProdFolders="Choose pre-production folders"
ChoosePostProdFolders="Choose post-production folders"
ErrorMessage="Error detected!"
ProjectComplete="Project creation finished!"


# Starting window
yad --geometry 500x350 --info --title="$WindowTitle" --text="<b>ProDISC Project DIrectory Structure Creator</b> is a set of scripts for Debian GNU/Linux (and derivatives like Ubuntu or Mint) to ease the creation of a directory structures for media projets.\n
<b>ProDISC</b> is Free/Libre Software released under the GNU GPL 3 license.\n
<b>   INSTRUCTIONS</b>\n
<b>   1.</b> Select project directory location\n
<b>   2.</b> Define project name\n
<b>   3.</b> Select folders to include\n"



# Select project directory location
home_folder="$(yad --file-selection --width=600 --height=400 --directory --title="$ChooseDirectory" )"

# Define project name
project_name=$(yad --entry --title="$WindowTitle" --width=400 --text="Enter project name" --entry-text "MyProject")

# Create the project
mkdir -p "${home_folder}/${project_name}/production/"&&
mkdir -p "${home_folder}/${project_name}/pre-production/"&&
mkdir -p "${home_folder}/${project_name}/post-production/"


# Choose folders to include in pre-production folder
preprod_folders=$(yad --width=640 --height=300 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChoosePreProdFolders" --column=Selected --column=Folders True script True storyboard True animatic True breakdown True design True references)

if [[ "$preprod_folders" =~ "script" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/script"
fi

if [[ "$preprod_folders" =~ "storyboard" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/storyboard"
fi

if [[ "$preprod_folders" =~ "animatic" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/animatic"
fi

if [[ "$preprod_folders" =~ "breakdown" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/breakdown"
fi

if [[ "$preprod_folders" =~ "design" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/design"&&
	mkdir -p "${home_folder}/${project_name}/pre-production/design/chars"&&
	mkdir -p "${home_folder}/${project_name}/pre-production/design/envs"

if [[ "$preprod_folders" =~ "references" ]]; then
	mkdir -p "${home_folder}/${project_name}/pre-production/references"

fi


# Choose folders to include in production folder
prod_folders=$(yad --width=640 --height=400 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChooseProdFolders" --column=Selected --column=Folders True models True titles True anim True renders)

if [[ "$prod_folders" =~ "models" ]]; then
	mkdir -p "${home_folder}/${project_name}/production/models"&&
	mkdir -p "${home_folder}/${project_name}/production/models/chars"&&
	mkdir -p "${home_folder}/${project_name}/production/models/chars/textures"&&
	mkdir -p "${home_folder}/${project_name}/production/models/props"&&
	mkdir -p "${home_folder}/${project_name}/production/models/props/textures"&&
	mkdir -p "${home_folder}/${project_name}/production/models/sets"&&
	mkdir -p "${home_folder}/${project_name}/production/models/sets/textures"
fi

if [[ "$prod_folders" =~ "titles" ]]; then
	mkdir -p "${home_folder}/${project_name}/production/titles"&&
	mkdir -p "${home_folder}/${project_name}/production/titles/opening"&&
	mkdir -p "${home_folder}/${project_name}/production/titles/final"
fi

if [[ "$prod_folders" =~ "anim" ]]; then
	mkdir -p "${home_folder}/${project_name}/production/anim"&&
	mkdir -p "${home_folder}/${project_name}/production/anim/scene01"&&
	mkdir -p "${home_folder}/${project_name}/production/anim/scene01/shot_01.01"&&
	mkdir -p "${home_folder}/${project_name}/production/anim/scene01/shot_01.02"&&
	mkdir -p "${home_folder}/${project_name}/production/anim/scene02"
fi

if [[ "$prod_folders" =~ "renders" ]]; then
	mkdir -p "${home_folder}/${project_name}/production/renders"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.01"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.01/passes"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.01/composite"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.02"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.02/passes"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene01/shot_01.02/composite"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/finals/scene02"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/tests"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/tests/scene01"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/tests/scene01/shot_01.01"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/tests/scene01/shot_01.02"&&
	mkdir -p "${home_folder}/${project_name}/production/renders/tests/scene02"
fi




# Choose folders to include in post-production folder
postprod_folders=$(yad --width=640 --height=300 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChoosePostProdFolders" --column=Selected --column=Folders True delivers True audio True final_shots)

if [[ "$postprod_folders" =~ "delivers" ]]; then
	mkdir -p "${home_folder}/${project_name}/post-production/delivers"&&
	mkdir -p "${home_folder}/${project_name}/post-production/delivers/WebM"
fi

if [[ "$postprod_folders" =~ "final_shots" ]]; then
	mkdir -p "${home_folder}/${project_name}/post-production/final_shots"&&
	mkdir -p "${home_folder}/${project_name}/post-production/final_shots/scene01"&&
	mkdir -p "${home_folder}/${project_name}/post-production/final_shots/scene01/shot_01.01"&&
	mkdir -p "${home_folder}/${project_name}/post-production/final_shots/scene01/shot_01.02"&&
	mkdir -p "${home_folder}/${project_name}/post-production/final_shots/scene02"
fi

if [[ "$postprod_folders" =~ "audio" ]]; then
	mkdir -p "${home_folder}/${project_name}/post-production/audio/"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/sfx"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/dialogues"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/music"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/final"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/final/scene01"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/final/scene01/shot_01.01"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/final/scene01/shot_01.02"&&
	mkdir -p "${home_folder}/${project_name}/post-production/audio/final/scene02"

fi

else
    exit 0

fi

# Finished!

    yad --info --width=300 --title "$WindowTitle" --text "$ProjectComplete"
#    echo "DONE!"
    exit 0
