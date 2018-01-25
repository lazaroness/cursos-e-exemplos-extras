user   = ARGV[0]
alerta = ARGV[1]
icon   = ""
`su #{user} -c 'DISPLAY=:0 notify-send "#{alerta}"'`
