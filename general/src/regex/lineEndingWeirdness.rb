require 'pp'

control = 'abc'
experimentWithLf = control + 10.chr
experimentWithCr = control + 13.chr

p1 = "/^" + control + "$/"
p2 = "/\A" + control + "\z/"

result = {
    "control" => {
        "with ^$" => p1.match(control),
        "with \A\Z" => p2.match(control)
    },
    "experimentWithLf" => {
        "with ^$" => p1.match(experimentWithLf),
        "with \A\Z" => p2.match(experimentWithLf)
    },
    "experimentWithCr" => {
        "with ^$" => p1.match(experimentWithCr),
        "with \A\Z" => p2.match(experimentWithCr)
    }
}

pp result
