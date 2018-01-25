class Telefone < ActiveRecord::Base

  TIPO = {
    'Comercial'    => 'Comercial',
    'Residencial'  => 'Residencial',
    'Celular'      => 'Celular',
    'Rádio Nextel' => 'Rádio Nextel'
  }

  def to_s
    "#{self.tipo}: #{self.ddd} #{self.ddi} #{self.numero}"
  end

end
