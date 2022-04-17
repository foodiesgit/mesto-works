import folium
import pandas as pd

myMap = folium.Map(location=[37.065842, 37.376080], zoom_start=15)


municipalities = pd.read_csv('gaziantep.csv')
for _, item in municipalities.iterrows():
  folium.Marker(
    location = [item['lati'], item['long']],
    popup = item['location'],
    tooltip = item['info'],
    icon = folium.Icon(color = item['iconcolor'])
  ).add_to(myMap)

myMap.save('map-dynamic.html')