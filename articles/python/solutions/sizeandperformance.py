import sys
import timeit
testList = [item for item in range(1,10000)]
testTuple = tuple(testList)
print('Size of list:', sys.getsizeof(testList))
print('Size of tuple:', sys.getsizeof(testTuple))

print('Time of list:', timeit.timeit(stmt = "numbers = [1,2,3,4,5]"))
print('Time of tuple:', timeit.timeit(stmt = "numbers = (1,2,3,4,5)"))