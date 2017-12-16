class PersonalMilestone:
    def __init__(self, date, name):
        self.date = date
        self.name = name

    def __repr__(self):
        return "{{date: {date}, name: {name}}}".format(date=self.date, name=self.name)

people_data = {"2008-11-08": "Jacinda", "1990-10-27": "Bill", "2014-09-20": "James", "1979-05-24": "Winston"}

people = {date: PersonalMilestone(date, name) for (date, name) in people_data.items()}

print("\n".join(['%s => %s' % (date, person) for (date, person) in people.items()]))
