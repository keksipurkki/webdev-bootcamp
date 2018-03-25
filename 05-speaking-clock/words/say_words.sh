rm -f *.wav *.aiff
while read word
do
  echo $word
  [[ -r "${word}.aiff" ]] && rm "${word}.aiff"
  say -f - -vSamantha -o "$word.aiff" <<< "$word"
done < words.txt

for i in *.aiff
do
  ffmpeg -i $i "${i/.aiff}".wav
done

rm *.aiff
