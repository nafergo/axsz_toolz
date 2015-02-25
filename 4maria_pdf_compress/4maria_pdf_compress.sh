#!/bin/bash
# 4maria_pdf_compress: a script to compress pdf files with ghostscript
# Version: 1.0
# Copyleft 2014 Nelson Gonçalves [nafergo] (animaxionstudioz.com)
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
WindowTitle="4maria_pdf_compress"
ChooseFile="Choose PDF to compress"
ErrorMessage="Error detected!"
ProjectComplete="PDF compression finished!"


# Starting window
zenity --geometry 500x350 --info --title="$WindowTitle" --text="<b>4maria_pdf_compress</b> is a  a script to compress pdf files with ghostscript.\n
<b>4maria_pdf_compress</b> is Free/Libre Software released under the GNU GPL 3 license.\n
<b>   INSTRUCTIONS</b>\n
<b>   1.</b> Select PDF you want to compress\n
<b>   2.</b> Press OK\n
<b>   3.</b> that's it!\n"


# Select pdf to compress
input_pdf=$(zenity --file-selection --title="$ChooseFile" );
echo ${input_pdf}

# Define output name
output_name=$(yad --entry --title="$WindowTitle" --width=400 --text="Enter new pdf file name" --entry-text "MyCompressedPDF")


# Compress the project
gs -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dPDFSETTINGS=/screen -dNOPAUSE -dQUIET -dBATCH -sOutputFile=${output_name} ${input_pdf}



# Finished!

    zenity --info --width=300 --title "$WindowTitle" --text "$ProjectComplete"
#    echo "DONE!"
    exit 0
