import sys

try:
	1 / 0
except:
	print(sys.exc_info()[0])
