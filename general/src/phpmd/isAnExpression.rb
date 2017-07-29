def takeAChance
    firstChance = Random.new.rand(0..1).zero?

    message = if firstChance
        "firstChance was true";
    else
        "firstChance was false";
    end

    puts message
end

takeAChance
