var1 = 1.9
var2 = 1.8 + 0.1

print(var2)
if var1 == var2 then
  print('verdadeiro')
else
  print('falso')
end

if var1 == math.round(var2, 2) then
  print('verdadeiro')
else
  print('falso')
end

if var1 == math.truncate(var2, 2) then
  print('verdadeiro')
else
  print('falso')
end
