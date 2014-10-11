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
WindowTitle="VFX Production Directory Creator"
ChooseDirectory="Choose project directory location"
ChooseOutputFolders="Choose OUTPUT folders"
ChooseInputFolders="Choose INPUT folders"
ChooseVFXFolders="Choose VFX production folders"
ErrorMessage="Error detected!"
ProjectComplete="Project creation finished!"


# Starting window
yad --width=500 --height=100 --info --title="$WindowTitle" --text="<b>ProDISC Project DIrectory Structure Creator</b> is a set of scripts for Debian GNU/Linux (and derivatives like Ubuntu or Mint) to ease the creation of a directory structures for media projets.\n
<b>ProDISC</b> is Free/Libre Software released under the GNU GPL 3 license.\n
<b>INSTRUCTIONS</b>\n
<b>1.</b> Select project directory location\n
<b>2.</b> Define project name\n
<b>3.</b> Select folders to include\n"



# Select project directory location
home_folder="$(yad --file-selection --width=600 --height=400 --directory --title="$ChooseDirectory" )"

# Define project name
project_name=$(yad --entry --title="$WindowTitle" --width=400 --text="Enter project name" --entry-text "MyProject")

# Create the project
mkdir -p "${home_folder}/${project_name}/project_docs/"&&
mkdir -p "${home_folder}/${project_name}/input/"&&
mkdir -p "${home_folder}/${project_name}/VFX/"&&
mkdir -p "${home_folder}/${project_name}/VFX/sequence_name"&&
mkdir -p "${home_folder}/${project_name}/VFX/sequence_name/shot_name"&&
mkdir -p "${home_folder}/${project_name}/output/"&&


# Choose folders to include in input folder
input_folders=$(yad --width=640 --height=300 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChooseInputFolders" --column=Selected --column=Folders True references True sources True assets)

if [[ "$input_folders" =~ "references" ]]; then
	mkdir -p "${home_folder}/${project_name}/input/references"
fi

if [[ "$input_folders" =~ "sources" ]]; then
	mkdir -p "${home_folder}/${project_name}/input/sources/synopsis"&&
	mkdir -p "${home_folder}/${project_name}/input/sources/storyboard"&&
	mkdir -p "${home_folder}/${project_name}/input/sources/sequences"&&
	mkdir -p "${home_folder}/${project_name}/input/sources/sequences/sequence_name"&&
	mkdir -p "${home_folder}/${project_name}/input/sources/sequences/sequence_name/shot_name"
fi

if [[ "$input_folders" =~ "assets" ]]; then
	mkdir -p "${home_folder}/${project_name}/input/assets"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/characters"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/props"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/textures"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/mocap"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/mattes"&&
	mkdir -p "${home_folder}/${project_name}/input/assets/animation"
fi



# Choose folders to include in VFx folder
vfx_folders=$(yad --width=640 --height=400 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChooseVFXFolders" --column=Selected --column=Folders True plates True references True renders)

if [[ "$vfx_folders" =~ "plates" ]]; then
	mkdir -p "${home_folder}/${project_name}/VFX/sequence_name/shot_name/plates"
fi

if [[ "$vfx_folders" =~ "references" ]]; then
	mkdir -p "${home_folder}/${project_name}/VFX/sequence_name/shot_name/references"
fi

if [[ "$vfx_folders" =~ "renders" ]]; then
	mkdir -p "${home_folder}/${project_name}/VFX/sequence_name/shot_name/renders"
fi




# Choose folders to include in output folder
output_folders=$(yad --width=640 --height=400 --list --checklist --hide-header --multiple --title="$WindowTitle" --text="$ChooseOutputFolders" --column=Selected --column=Folders True FINALS True approval True tests)

if [[ "$output_folders" =~ "FINALS" ]]; then
	mkdir -p "${home_folder}/${project_name}/output/FINALS"&&
	mkdir -p "${home_folder}/${project_name}/output/FINALS/sequence_name"&&
	mkdir -p "${home_folder}/${project_name}/output/FINALS/sequence_name/shot_name"&&
mkdir -p "${home_folder}/${project_name}/output/FINALS/sequence_name/shot_name/low_res"&&
mkdir -p "${home_folder}/${project_name}/output/FINALS/sequence_name/shot_name/comp_res"&&
	mkdir -p "${home_folder}/${project_name}/output/FINALS/sequence_name/shot_name/comp_file"
fi

if [[ "$output_folders" =~ "approval" ]]; then
	mkdir -p "${home_folder}/${project_name}/output/approval"&&
	mkdir -p "${home_folder}/${project_name}/output/approval/sequence_name"&&
	mkdir -p "${home_folder}/${project_name}/output/approval/sequence_name/shot_name"&&
	mkdir -p "${home_folder}/${project_name}/output/approval/sequence_name/shot_name/low_res"&&
	mkdir -p "${home_folder}/${project_name}/output/approval/sequence_name/shot_name/comp_res"
fi

if [[ "$output_folders" =~ "tests" ]]; then
	mkdir -p "${home_folder}/${project_name}/output/tests"&&
	mkdir -p "${home_folder}/${project_name}/output/tests/sequence_name"&&
	mkdir -p "${home_folder}/${project_name}/output/tests/sequence_name/shot_name"&&
	mkdir -p "${home_folder}/${project_name}/output/tests/sequence_name/shot_name/low_res"
fi


else
    exit 0

fi


# Finished!

    yad --info --width=300 --title "$WindowTitle" --text "$ProjectComplete"
#    echo "DONE!"
    exit 0
