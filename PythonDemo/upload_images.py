#!/usr/bin/python
import os,cgi
from PIL import Image, ImageDraw, ImageFont, ImageEnhance, ImageFilter, ImageOps

def createteaser(infile, position, text, action):

    outfile = os.path.splitext(infile)[0] + "_teaser.jpg"
    # get an image
    base_img = Image.open(infile).convert('RGBA')
    base_x = base_img.size[0]
    base_y = base_img.size[1]
    position_emboss_top = 10
    position_emboss_bottom = 10

    if(action == "default"):
        frame = Image.open(infile).convert("RGBA")
        box = (int(base_x * 0.2), int(base_y * 0.2), base_x - int(base_x * 0.2), base_y - int(base_y * 0.2))
        region = base_img.crop(box)
        frame = ImageEnhance.Contrast(frame)
        frame = frame.enhance(0.2)
        frame.paste(region, box)
    elif(action == "blur"):
        frame = Image.open(infile).convert("RGBA")
        frame = frame.filter(ImageFilter.BLUR)
        frame = frame.filter(ImageFilter.SMOOTH)
        # frame.paste(region, box)
    elif (action == "emboss"):
        frame = Image.open(infile).convert("RGBA")
        box = (int(base_x * 0.1), int(base_y * 0.1), int(base_x - int(base_x * 0.1)), int(base_y - int(base_y * 0.1)))
        region = base_img.crop(box)
        frame = frame.filter(ImageFilter.EMBOSS)
        frame.paste(region, box)
        position_emboss_top =  int(base_y * 0.1)+10
        position_emboss_bottom = int(base_y * 0.1)+10
    elif (action == "edge"):
        frame = Image.open(infile).convert("RGBA")
        frame = frame.filter(ImageFilter.EDGE_ENHANCE)
        frame = frame.filter(ImageFilter.SHARPEN)
    elif (action == "mirror"):
        frame = Image.open(infile).convert("RGBA")
        frame = ImageOps.mirror(frame)

    # make a blank image for the text, initialized to transparent text color
    txt = Image.new('RGBA', base_img.size, (255, 255, 255, 0))

    # get a font
    fnt = ImageFont.truetype("myFont.ttf", int(base_y * 0.10))
    # get a drawing context
    d = ImageDraw.Draw(txt)
    textsize = d.textsize(text, fnt)
    text_x = textsize[0]
    text_y = textsize[1]

    if(position == "middle"):
        d.text((( base_x - text_x)/ 2, (base_y - text_y) / 2), text, font=fnt,
               fill=(153, 0, 0, 255))
    elif (position == "top" ):
        d.text(((base_x - text_x)/ 2, position_emboss_top), text, font=fnt, fill=(153, 0, 0, 255))
    elif (position == "bottom"):
        d.text(((base_x - text_x)/ 2, base_y-text_y-position_emboss_bottom), text, font=fnt, fill=(153, 0, 0, 255))

    out = Image.alpha_composite(frame, txt)
    out = ImageOps.expand(out, border=5, fill='white')
    out = ImageOps.expand(out, border=5, fill='black')
    # out.show()

    try:
        if (os.path.exists(outfile)):
            os.remove(outfile)
        out.save(outfile, "JPEG")
        return True
    except IOError:
        return False

def createthumbnail(infile, thumbnail_size):

    if(thumbnail_size == 32):
        size = (32,32)
    elif (thumbnail_size == 64):
        size = (64,64)
    elif (thumbnail_size == 128):
        size = (128, 128)
    elif (thumbnail_size == 256):
        size = (256, 256)

    outfile = os.path.splitext(infile)[0] + "_thumb.jpg"

    try:
        im = Image.open(infile)
        im.thumbnail(size)
        if (os.path.exists(outfile)):
            os.remove(outfile)
        im.save(outfile,"JPEG")
        return True
    except IOError:
        return False

def createbookcover(infile, author, title, description, genre):
    outfile = os.path.splitext(infile)[0] + "_cover.jpg"
    size = (300, 300)
    # get the front cover image and processing it
    front_img = Image.open(infile).convert("RGBA")
    front_img.thumbnail(size)
    front_x, front_y = front_img.size
    box = (int(front_x * 0.1), int(front_y * 0.1), front_x - int(front_x * 0.1), front_y - int(front_y * 0.1))
    region = front_img.crop(box)
    region = region.filter(ImageFilter.DETAIL)
    front_img = front_img.filter(ImageFilter.EMBOSS)
    front_img.paste(region, box)
    front_img = ImageOps.expand(front_img, border=3, fill='white')
    front_img = ImageOps.expand(front_img, border=3, fill='black')
    # front_img.show()
    final_front_x, final_front_y = front_img.size

    # make the back cover image
    back_cover_img = ImageOps.mirror(front_img)
    back_cover_img = back_cover_img.filter(ImageFilter.BLUR)
    back_cover_img = back_cover_img.filter(ImageFilter.SMOOTH)

    # add text on front cover
    front_pg_font = ImageFont.truetype("Origicide.ttf", int(final_front_y * 0.20))
    front_text = ImageDraw.Draw(front_img)
    front_titlesize = front_text.textsize(title, front_pg_font)
    front_text.text(((final_front_x - front_titlesize[0]) / 2, int(front_y * 0.1) + 20), title, font=front_pg_font,
                    fill=(102, 0, 34, 255))

    # Creating the spine image
    spine = Image.new('RGBA', (100, final_front_y), (51, 153, 51, 0))
    font = ImageFont.truetype("TypoLatinserif-Bold.ttf", int(final_front_y * 0.08))
    font_title = ImageFont.truetype("TypoLatinserif-Bold.ttf", int(final_front_x * 0.04))
    font_author = ImageFont.truetype("TypoLatinserif-Bold.ttf", int(final_front_x * 0.04))
    # get a drawing context
    d = ImageDraw.Draw(spine)

    titlesize = d.textsize(title, font_title)
    authorsize = d.textsize(author, font_author)
    artz_title = "A\nr\nz\nt\ne\nc\nA"
    artz_title_size = d.multiline_textsize(artz_title, font)
    creation_label = "Creations"
    creation_label_size = d.textsize(creation_label, font)
    by_label = "by"
    by_label_size = d.textsize(by_label, font)

    d.multiline_text((46, 5), artz_title, font=font, fill=(255, 255, 255, 255))
    d.text(((100 - creation_label_size[0]) / 2, artz_title_size[1] + 5), creation_label, font=font,
           fill=(255, 255, 255, 255))
    d.text(((100 - titlesize[0]) / 2, artz_title_size[1] + creation_label_size[1] + 10), title, font=font_title,
           fill=(255, 255, 255, 255))
    d.text((42, artz_title_size[1] + creation_label_size[1] + titlesize[1] + 10), "by", font=font_title,
           fill=(255, 255, 255, 255))
    d.text(
        ((100 - authorsize[0]) / 2, artz_title_size[1] + creation_label_size[1] + titlesize[1] + by_label_size[1] + 5),
        author, font=font_author, fill=(255, 255, 255, 255))
    # spine.show()

    # set up the back cover image
    back_pg_font = ImageFont.truetype("Origicide.ttf", int(final_front_y * 0.08))
    copyright_font = ImageFont.truetype("Origicide.ttf", int(final_front_y * 0.06))
    back_text = ImageDraw.Draw(back_cover_img)
    back_descsize = back_text.textsize(description + "\n" + genre, back_pg_font)
    back_text.text(((back_cover_img.size[0] - back_descsize[0]) / 2, int(back_cover_img.size[1] * 0.1) + 20),
                   description + "\nGenre:  " + genre, font=back_pg_font,
                   fill=(0, 255, 255, 255))
    copyright_text = "Copyright (C) Arzteca Creations"
    copyright_textsize = back_text.textsize(copyright_text, copyright_font)
    back_text.text(((back_cover_img.size[0] - copyright_textsize[0]) / 2,
                    back_cover_img.size[1] - int(copyright_textsize[1]) - 10),
                   copyright_text, font=copyright_font,
                   fill=(0, 255, 255, 255))

    cover = Image.new("RGBA", ((2 * final_front_x) + 100, final_front_y))
    box = (0, 0, final_front_x, final_front_y)
    cover.paste(front_img, box)
    cover.paste(spine, (final_front_x, 0, final_front_x + 100, final_front_y))
    cover.paste(back_cover_img, (final_front_x + 100, 0, (2 * final_front_x) + 100, final_front_y))
    # cover.show()

    try:
        if (os.path.exists(outfile)):
            os.remove(outfile)
        cover.save(outfile, "JPEG")
        return True
    except IOError:
        return False

def createwatermark(infile):
    outfile = os.path.splitext(infile)[0] + "_watermark.jpg"
    # get an image
    orig_img = Image.open(infile).convert('RGBA')
    orig_x = orig_img.size[0]
    orig_y = orig_img.size[1]
    text = "ArztecA"

    # make a blank image for the text, initialized to transparent text color
    txt = Image.new('RGBA', orig_img.size, (255, 255, 255, 0))
    # get a font
    fnt = ImageFont.truetype("watermarkFont.ttf", int(orig_y * 0.20))
    # get a drawing context
    d = ImageDraw.Draw(txt)
    textsize = d.textsize(text, fnt)
    text_x = textsize[0]
    text_y = textsize[1]

    d.text(((orig_x - text_x) / 2, (orig_y - text_y) / 2), text, font=fnt, fill=(0, 0, 0, 80))
    txt = txt.rotate(45)

    out_img = Image.alpha_composite(orig_img, txt)
    try:
        if(os.path.exists(outfile)):
            os.remove(outfile)
        out_img.save(outfile, "JPEG")
        return True
    except IOError:
        return False

try:
    print "Content-type: text/html\n\n",
    form = cgi.FieldStorage()

    title = form.getvalue("title")
    description = form.getvalue("description")
    genre = form.getvalue("genre")
    file = form.getvalue("fileToUpload")
    filename = form["fileToUpload"].filename
    if(len(filename) == 0):
        filename = form.getvalue("existing_img")
    thumbnail_img_size = int(form.getvalue("thumbnail"))
    teaser_text = form.getvalue("teaser_text")
    position = form.getvalue("position")
    action = form.getvalue("process_action")
    author = form.getvalue("author")

    image_ext = filename.split(".")[1]

    if(image_ext == "jpeg" or image_ext == "jpg"):
        file_loc = "../tmpmedia/"+filename
        if(file is not None):
            f = open(file_loc, 'wb')
            f.write(file)
            f.close()

        thumbnail_status = createthumbnail(file_loc, thumbnail_img_size)
        teaser_status = createteaser(file_loc, position, teaser_text, action)
        cover_status = createbookcover(file_loc, author, title, description, genre)
        watermark_status = createwatermark(file_loc)

        # teaser_status = createteaser("../tmpmedia/"+filename, "bottom", "Beautiful Landscape", "blur")

        if(thumbnail_status and teaser_status and cover_status and watermark_status):
            print "SUCCESS",
        else:
            print "ERROR",
    else:
        print "FORMAT_ERR"

except:
    cgi.print_exception()


