#!/usr/bin/env python

from slacker import Slacker

class Slack(object):
    
    def __init__(self, Access_token, channel):
        self.slack = Slacker(Access_token)
        self.channel= channel

    def sendMessage(self, text):
        self.slack.chat.post_message(self.channel, text)
        
