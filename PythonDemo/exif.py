#!/usr/bin/python

import os,sys,cgi
from PIL import Image
from PIL.ExifTags import TAGS

keysToShow = ["ExifVersion","CompressedBitsPerPixel","DateTimeOriginal","DateTimeDigitized","MaxApertureValue","MeteringMode",
    "LightSource","Flash","FocalLength","ExifImageWidth","ImageDescription","Make","Model","Orientation","XResolution",
    "YResolution","ExposureTime","ExifInteroperabilityOffset","ColorSpace","GPSInfo","LensSpecification","ExifImageHeight",
    "BrightnessValue"]



try:
    print "Content-type: text/html\n\n"
    form = cgi.FieldStorage()
    infile = form.getvalue("image_name")
    infile = "../tmpmedia/"+infile
    if Image.open(infile)._getexif() is not None:
        for (k,v) in Image.open(infile)._getexif().items():
            if( (TAGS.get(k)) in keysToShow  and v ):
                print '%s = %s' % (TAGS.get(k), v)
    else:
        print "EMPTY"
except:
    print "EXCEPTION"




