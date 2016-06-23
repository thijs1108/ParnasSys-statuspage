import requests, time
from Component import Component
statusboardlink = "http://localhost/api/v1"
token = ""
components = []
components.append(Component(statusboardlink, token, 1, 1, 'http://start.parnassys.net'))
components.append(Component(statusboardlink, token, 3, 2, 'http://parnassys.zendesk.com/access/normal'))

while True:
    for component in components:
        responseTime = component.getResponseTime()
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

