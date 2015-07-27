begin
    zero = 0
	1 / zero
rescue Exception => e
	puts "Message: #{e.exception}"
	puts "Class: #{e.class}"
end