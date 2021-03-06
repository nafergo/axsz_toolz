#!/bin/bash
# a video to WebM encoder based on FFmpeg
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
function cancel() {
   
   if [ $? = 1 ];
	then 
	zenity --error --title="$WindowTitle" --text "Program Aborted!"
	/bin/kill -9 $(pidof -x $0)
	/bin/kill -9 $(pidof zenity) #Just in case...
	
	fi
}
trap cancel ERR SIGTERM


# zenity messages
WindowTitle="Video WebMizer"
OK="Continue"
EXIT="Quit"
ChooseFile="Choose video to transcode"
ChooseDirectory="Choose export folder"
ChooseVideoQuality="Video Quality"
ChooseAudioQuality="Audio Quality"
ChooseResolution="Choose output resolution"
ErrorMessage="Error detected!"
MovieComplete="Encoding finished! WebM movie saved in output folder."


# Starting window
zenity --width=600 --info --title="$WindowTitle" --text="<b>Video WebMizer</b> is a GNU/Linux program to ease the creation of WebM videos with FFmpeg.\n
<b>Video WebMizer</b> is Free/Libre Software released under the GNU GPL 3 license.\n
<b><u>NOTE:</u></b> Please make sure that you have FFmpeg 0.6 or above installed.\n
<b>INSTRUCTIONS</b>\n
<b>1.</b> Select video file to convert\n
<b>2.</b> Choose output folder\n
<b>3.</b> Choose WebM video quality\n
<b>4.</b> Choose WebM audio quality\n
<b>5.</b> Choose WebM resolution"




# Get today's date and time
NOW=`date -d today +%Y%m%d_%T`

#Output filename
OUTFILE="Video_WebMized"

# Choose video to transcode
file_in=$(zenity --file-selection --title="$ChooseFile" );
echo ${file_in}

# Select export folder
dir_out="$(zenity --file-selection --directory --title="$ChooseDirectory" )"
#debug
echo ${dir_out}

# Choose video quality variable
video_quality=$(zenity --width=640 --height=300 --list --title="$WindowTitle" --text="$ChooseVideoQuality" --print-column="2" --column="Quality" --column="Command" --column="Description" "Best" "best" "Best quality output but is slow." "Good" "good -cpu-used 0" "Probably most used. Quality very close to Best but runs faster" "Fastest" "good -cpu-used 3" "Boost to encode speed but noticeable impact on quality.")

# Choose audio quality variable
audio_quality=$(zenity --width=300 --height=600 --list --title="$WindowTitle" --text="$ChooseAudioQuality" --column="Quality" "10" "9" "8" "7" "6" "5" "4" "3" "2" "1" "0")

# Choose output resolution format
resolution=$(zenity --width=640 --height=400 --list --title="$WindowTitle" --text="$ChooseResolution" --print-column="2" --column="Resolution" --column="Command" "360p 640x360 24fps" "24 -vpre libvpx-360p -vf scale=640:360" "360p 640x360 25fps" "25 -vpre libvpx-360p -vf scale=640:360" "360p 640x360 29.97fps" "30000/1001 -vpre libvpx-360p -vf scale=640:360" "720p 1280x720 24fps" "24 -vpre libvpx-720p -vf scale=1280:720" "720p 1280x720 25fps" "25 -vpre libvpx-720p -vf scale=1280:720" "720p 1280x720 29.97fps" "30000/1001 -vpre libvpx-720p -vf scale=1280:720" "1080p 1920×1080 24fps" "24 -vpre libvpx-1080p -vf scale=1920:1080" "1080p 1920×1080 25fps" "25 -vpre libvpx-1080p -vf scale=1920:1080" "1080p 1920×1080 29.97fps" "30000/1001 -vpre libvpx-1080p -vf scale=1920:1080")

    ffmpeg -i "${file_in}" -r ${resolution} -quality ${video_quality} -pass 1 -an "${dir_out}"/${OUTFILE}_${NOW}.webm && ffmpeg -i "${file_in}" -r ${resolution} -quality ${video_quality} -pass 2 -acodec libvorbis -q:a ${audio_quality} "${dir_out}"/${OUTFILE}_${NOW}.webm 2>&1|zenity --width 500 --title "Video WebMizer" --text "Please wait while your video file is Webmized" --progress --pulsate --auto-close
	rm *.log
else
    exit 0

fi


# Finished!

    zenity --info --title "$WindowTitle" --text "$MovieComplete"
#    echo "DONE!"
    exit 0
