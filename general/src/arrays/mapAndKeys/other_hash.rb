class IndexedPerson

	def initialize(date, name)
		@date = date
		@name = name
	end

	def inspect
	    "{date:#{@date}; name: #{@name}}\n"
	end
end

peopleData = {"2008-11-08" => "Jacinda", "1990-10-27" => "Bill", "2014-09-20" => "James", "1979-05-24" => "Winston"}

people = peopleData.merge(peopleData) do |date, name|
	IndexedPerson.new(date, name)
end

puts people
