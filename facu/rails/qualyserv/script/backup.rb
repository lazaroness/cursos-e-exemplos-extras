arquivo = "#{Time.now.to_i}-qualyserv.tar.xz"
`sudo tar -Jcf /backup/projetos/rails/qualyserv/#{arquivo} -C /home/lazarone/projetos/rails/qualyserv .`
if File.exists? "/backup/projetos/rails/qualyserv/#{arquivo}"
  `zenity --info --text="Backup do Projeto QualyServ foi gerado com sucesso\!\nArquivo Gerado: /backup/projetos/rails/qualyserv/#{arquivo}"`
else
  `zenity --error --text="Erro ao tentar gerar o backup do projeto QualyServ\!"`
end
