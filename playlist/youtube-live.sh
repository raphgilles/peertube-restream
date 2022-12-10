cd /home/stream/playlist/videos

find . -name "*.ts" -type f -delete

yt-dlp -f "bestvideo[ext=mp4][vcodec!*=av01][height<=720]+bestaudio[ext=m4a]/best[ext=mp4]/best" -o "%(playlist_index)s.%(ext)s" 

for f in $(ls *.mp4); do
   ffmpeg -i $f -c copy -bsf:v h264_mp4toannexb -f mpegts $f.ts
done

find . -name "*.mp4" -type f -delete

## COMPILER ET STREAMER PLUSIEURS FICHIERS 
CONCAT=$(echo $(ls *.ts) | sed -e "s/ /|/g")


ffmpeg -re -y -i "concat:$CONCAT" -filter:v scale=1280:720:force_original_aspect_ratio=decrease,pad=1280:720:-1:-1:color=black -c:v libx264 -preset veryfast -maxrate 3000k -bufsize 6000k -pix_fmt yuv420p -r 25 -g 50 -c:a aac -b:a 160k -ac 2 -ar 44100 -f flv \
"rtmp://peertube.stream:1935/live/" 