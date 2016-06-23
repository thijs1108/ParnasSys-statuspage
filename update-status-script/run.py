import requests, time, json
from pprint import pprint
from Component import Component

with open('settings.json') as data_file:    
    data = json.load(data_file)


statusboardlink = data['statusboardlink']
token = data['token']
components = []
for component in data['components']:
    components.append(Component(statusboardlink, token, component['Cid'], component['Mid'], component['location']))

while True:
    for component in components:
        responseTime = component.getResponseTime()
        if(component.hasComponent()):
            if(responseTime==-1):
                component.resetSlowAnswer()
                if(component.tooMuchNoAnswer(10)):
                    component.setStatus(4) #grote storing
            elif(responseTime>800):
                component.resetNoAnswer()
                if(component.tooMuchSlowAnswer(10)):
                    component.setStatus(2) #performance issues
            else:
                component.resetSlowAnswer()
                component.resetNoAnswer()
                component.setStatus(1) #operationeel
        if(component.hasMetric()):
            component.postMetricsPoints(responseTime)
    time.sleep(10)

