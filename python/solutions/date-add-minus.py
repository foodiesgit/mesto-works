import time
from datetime import datetime
from datetime import timedelta

#------------------------------------------- add or minus days

print(f'Adding Days------------------------{datetime.now() + timedelta(days=5)}')
print(f'Minus Days-------------------------{datetime.now() - timedelta(days=5)}')