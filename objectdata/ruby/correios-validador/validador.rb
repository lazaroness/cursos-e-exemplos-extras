require 'active_support'

plps  = File.read("/home/lazarone/projetos/correios/kwasar_codigos_errados.csv").split("\n").map{|c| c.split("|")}
plps_files = {}
textos     = {}
plps.map{|p| p[3]}.uniq.each do |cod|
    plps_files[cod] = File.open("/home/lazarone/projetos/correios/plps_erradas/kwasar_codigos_errados_plp_#{cod}.csv", 'w+')
    plps_files[cod].puts "NUMERO|CLIENTE|NOTA|PLP|COD. RASTREIO|COD. RASTREIO ERRADO"
  if File.exists? "/home/lazarone/projetos/correios/codigos_plp/#{cod}.cod"
    puts cod
    texto       = File.read("/home/lazarone/projetos/correios/codigos_plp/#{cod}.cod") 
    textos[cod] = { :posicao => 0, :texto => texto.split("\n").collect{|a| a.split(": ").last.squish}}
  end
end
plps.each do |plp|
  unless textos[plp[3]].nil?
    if plp[5].blank?
      atual  = textos[plp[3]]
      plp[5] = atual[:texto][atual[:posicao]]
      atual[:posicao] += 1
      textos[plp[3]] = atual
    end
  end
   unless plp[5].eql? plp[4]
     plps_files[plp[3]].puts plp.join("|")
   end
end
