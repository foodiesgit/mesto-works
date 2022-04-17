import folium

myMap = folium.Map(location=[37.065842, 37.376080], zoom_start=15)

# logoIcon  = folium.features.CustomIcon('./logo.png', icon_size=(50, 50))


# folium.CircleMarker(
#   location=[37.066247,37.373276],
#   radius=50,
#   popup="Gaziantep Buyuksehir Belediyesi",
#   color="#428bca",
#   fill=True,
#   fill_color="#428bca"
# ).add_to(myMap)

folium.Marker([37.066247,37.373276],
popup = "<strong>Gaziantep Buyuksehir Belediyesi</strong>",
tooltip = 'Daha Fazla Bilgi!',
icon = folium.Icon(color = 'orange')).add_to(myMap)

folium.Marker([37.057617,37.379658],
popup = "<strong>Gaziantep Sahinbey</strong>",
tooltip = 'Daha Fazla Bilgi!',
icon = folium.Icon(color='red')).add_to(myMap)

folium.Marker([37.072505,37.395385],
popup = "<strong>Gaziantep Sehitkamil</strong>",
tooltip = 'Daha Fazla Bilgi!',
icon = folium.Icon(color='red')).add_to(myMap)

folium.Marker([37.032638,37.297643],
popup = "<strong>Gaziantep Burc Tabiat Parki</strong>",
tooltip = 'Daha Fazla Bilgi!',
icon = folium.Icon(color='green', icon="leaf")).add_to(myMap)

folium.Marker([37.06276980253846, 37.16941939677283],
popup = "<strong>Gaziantep Burc Goleti</strong>",
tooltip = 'Daha Fazla Bilgi!',
icon = folium.Icon(color='blue', icon="tint")).add_to(myMap)


m.save('map.html')