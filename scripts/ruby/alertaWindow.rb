@user   = ARGV[0]
@alerta = ARGV[1]
@quantidade = ARGV[2]

raise 'Usuario Invalido' if @user.nil?

if @alerta.nil?
  @alerta = Time.now.strftime('%H:%M:%S %d/%m/%Y')
end

if @quantidade.to_f.zero?
  @quantidade = 1
end

@quantidade.to_i.times do |i|
  `su #{@user} -c 'DISPLAY=:0 zenity --info --text="#{@alerta}"'`
end
