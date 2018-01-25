require 'digest'

90000000000000000000000000000.times do |i|
#5.times do |i|
  text = Time.now.to_s

  md5 = Digest::MD5.new
  md5.update text
  print md5.hexdigest
end
