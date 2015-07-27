import sys

try:
	zero = 0
	1 % zero
except:
	print(sys.exc_info()[0])
