require "active_support"

File.open("/home/lazarone/projetos/correios/processar_arquivo/teste.cod", "a+") do |file|
  File.readlines("/home/lazarone/projetos/correios/processar_arquivo/teste").each do |row|
    file.puts "Code128: #{row}" if row.start_with? "JS"
  end
end
