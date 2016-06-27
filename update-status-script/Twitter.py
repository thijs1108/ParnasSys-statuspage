#!/usr/bin/env python

import tweepy

class Twitter(object):
    
    def __init__(self, Customer_key, Customer_secret, Access_token, Access_token_secret):
        self.auth = tweepy.OAuthHandler(Customer_key,Customer_secret)
        self.auth.set_access_token(Access_token,Access_token_secret)
        self.api = tweepy.API(self.auth)

    def tweet(self, text):
        self.api.update_status(text)
        
