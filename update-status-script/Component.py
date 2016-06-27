#!/usr/bin/env python

import requests
import time
import wget
from Cachet import Cachet

class Component(object):
    
    def __init__(self, statusboardlink, token, Cid, metricId, hyperlink, name):
        self.statusboard = Cachet(statusboardlink,token)
        self.Cid = Cid
        self.metricId = metricId
        self.hyperlink = hyperlink
        self.name = name
        self.times_no_answer = 0
        self.times_slow_answer = 0
        self.status=0

    def getCid(self):
        return self.Cid;

    def getName(self):
        return self.name

    def getMetricId(self):
        return self.metricId

    def setStatus(self, status):
        if(self.status!=status):
            self.statusboard.putComponentsByID(self.Cid, status=status)
            self.status=status
            return True
        else:
            return False

    #returns http response time of instance
    #returns -1 if not reachable
    def getResponseTime(self):
        try:
            return requests.get(self.hyperlink).elapsed.total_seconds() * 1000
        except:
            return -1

    def postMetricsPoints(self, value):
        self.statusboard.postMetricsPointsByID(self.metricId, value)

    def hasMetric(self):
        return (self.metricId>=0)

    def hasComponent(self):
        return (self.Cid>=0)

    def tooMuchNoAnswer(self, tooMuch):
        self.times_no_answer+=1
        return (self.times_no_answer>=tooMuch)

    def resetNoAnswer(self):
        self.times_no_answer=0

    def tooMuchSlowAnswer(self, tooMuch):
        self.times_slow_answer+=1
        return (self.times_slow_answer>=tooMuch)

    def resetSlowAnswer(self):
        self.times_slow_answer=0
