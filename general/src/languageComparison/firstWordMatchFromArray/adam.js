"use strict"

function firstMatch ( pattern, data ) {
  return data.reduce( ( prev, curr ) => {
      if ( prev.length > 0 ) { return prev }
      if ( pattern.test( curr ) ) { return curr }
      return prev
  }, '')
}

const pattern = /.+at/
let data = ['a', 'at', 'cat', 'scat', 'catch']

console.log( `the answer is: ${firstMatch( pattern, data )}` )