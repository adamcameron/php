## viaParam.rb

operator = ARGV[0] || "divide"
divisor = (ARGV[1] || 1).to_i
begin
	if operator == 'divide' then
		result = 1 / divisor
	else
		result = 1 % divisor
	end
rescue Exception => e
	puts "Operator: #{operator}"
	puts "Message: #{e.exception}"
	puts "Class: #{e.class}"
end
