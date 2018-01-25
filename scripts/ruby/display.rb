user    = ARGV[0]
comando = ARGV[1]
`su #{user} -c 'DISPLAY=:0 #{comando}'`
