module ApplicationHelper
 def image_tag(source, options = {})
    options.symbolize_keys!
    if options[:not_path].nil?
      options[:src] = path_to_image(source)
    else
      options[:src] = source
    end

    options[:alt] ||= File.basename(options[:src], '.*').split('.').first.to_s.capitalize

    if size = options.delete(:size)
      options[:width], options[:height] = size.split("x") if size =~ %r{^\d+x\d+$}
    end

    if mouseover = options.delete(:mouseover)
      options[:onmouseover] = "this.src='#{image_path(mouseover)}'"
      options[:onmouseout]  = "this.src='#{image_path(options[:src])}'"
    end

    tag("img", options)
  end

  def boolean_format(boolean)
    return 'sim' if boolean
    'não'
  end

  def date_format(date)
    mes = date.to_s.to_time.strftime("%m")
    dia = date.to_s.to_time.strftime("%d")
    ano = date.to_s.to_time.strftime("%Y")
    return "#{dia}/#{mes}/#{ano}"
  end

  def date_format_mes(date)
    meses = [nil] + %w(Janeiro Fevereiro Março Abril Maio Junho Julho Agosto Setembro Outubro Novembro Dezembro)
    mes = date.to_s.to_time.strftime("%m")
    dia = date.to_s.to_time.strftime("%d")
    ano = date.to_s.to_time.strftime("%Y")
    return "#{dia} de #{meses[mes.to_i]} de #{ano}"
  end
end
