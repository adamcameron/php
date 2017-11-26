(defrecord IndexedPerson [date name])

(def people-data (array-map "2008-11-08" "Jacinda" "1990-10-27" "Bill" "2014-09-20" "James" "1979-05-24" "Winston"))

(def people
  (reduce-kv
    (fn [people date name] (conj people (array-map date (IndexedPerson. date name))))
    (array-map)
    people-data))

(print people)
