begin
	1 / 0
rescue Exception => e
	puts "Message: #{e.exception}"
	puts "Class: #{e.class}"
end