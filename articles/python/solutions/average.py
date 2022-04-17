num_count = int(input('How many numbers?: '))
total_sum = 0

for item in range(num_count):
  numbers = float(input('Enter any numbers?'))
  total_sum += numbers
avg = total_sum / num_count
print(avg)