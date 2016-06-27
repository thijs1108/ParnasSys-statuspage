import requests, time, json
from Component import Component
from Twitter import Twitter

with open('settings.json') as data_file:    
    data = json.load(data_file)


statusboardlink = data['statusboardlink']
token = data['token']
twitter = False
if data['twitter']['use_twitter']==True:
    twittoken = data['twitter']
    twitter = Twitter(twittoken['Customer_key'],twittoken['Customer_secret'],twittoken['Access_token'],twittoken['Access_token_secret'])    

components = []
for component in data['components']:
    components.append(Component(statusboardlink, token, component['Cid'], component['Mid'], component['location'], component['name']))

while True:
    for component in components:
        responseTime = component.getResponseTime()
        if(component.hasComponent()):
            if(responseTime==-1):
                component.resetSlowAnswer()
                if(component.tooMuchNoAnswer(10)):
                    if(component.setStatus(4)): #grote storing
                        print(component.getName() + " heeft een grote storing")
                        if(twitter!=False):
                            twitter.tweet(component.getName() + " heeft helaas een grote storing")
            elif(responseTime>800):
                component.resetNoAnswer()
                if(component.tooMuchSlowAnswer(10)):
                    if(component.setStatus(2)): #performance issues
                        if(twitter!=False):
                            twitter.tweet(component.getName() + " heeft prestatieproblemen")
            else:
                component.resetSlowAnswer()
                component.resetNoAnswer()
                component.setStatus(1) #operationeel
                        
        if(component.hasMetric()):
            component.postMetricsPoints(responseTime)
    time.sleep(10)

